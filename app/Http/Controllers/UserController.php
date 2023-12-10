<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\File;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Query\Builder;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data['jumlahPesan'] = $this->getJumlahPesan();
    $pesan = $this->getPesan();

    $groupedPesan = $pesan->groupBy('id_pengirim');
    $data['pesan'] = $pesan;
    $data['pesanGrup'] = $groupedPesan->all();

    $files = File::where('id_user', Auth::id());
    if (request('search')) {
      $files->where('judul_file', 'like', '%' . request('search') . '%');
    }
    $data['files'] = $files->get();
    $data['salam'] = $this->greetings('Asia/Jakarta');

    // foreach ($groupedPesan as $pengirimId => $pesanPerPengirim) {
    //   dump($pesanPerPengirim);
    //   $pengirim = $pesanPerPengirim->first->user;

    //   echo "Pesan dari $pengirim->fullname:";

    //   // dump($pesanPerPengirim)
    //   foreach ($pesanPerPengirim as $pesanItem) {
    //     echo " $pesanItem->id_file";
    //   }
    // }
    return view('user.index', $data);
  }

  public function greetings(string $timezone): string
  {
    date_default_timezone_set($timezone);
    $Hour = date('G');
    if ($Hour >= 0 && $Hour <= 12) {
      return "Selamat pagi";
    } else if ($Hour >= 12 && $Hour <= 18) {
      return "Selamat sore";
    } else if ($Hour >= 18 || $Hour <= 24) {
      return "Selamat malam";
    }
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request)
  {
    //
  }

  /**
   * nampilin data profil kita
   */
  public function show($param = null)
  {
    $userId = Auth::id();
    $username = Auth::user()->username;

    if (is_null($param)) {
      $param = $userId;
    }

    $user = User::with(['files' => function (Builder $query) use ($param, $userId, $username) {
      /** @var Illuminate\Contracts\Database\Query\Builder $query */
      $query->when($param != $userId && $param != $username, function (Builder $query) {
        /** @var Illuminate\Contracts\Database\Query\Builder $query */
        $query->where('status', 'public');
      });
    }])->where('username', $param)->orWhere('id_user', $param)->first();

    // if ($param == Auth::id() || $param == Auth::user()->username) {
    //   $user = User::with('files')->where('username', $param)->orWhere('id_user', $param)->first();
    // } else {
    //   $user = User::with(['files' => function (Builder $query) {
    //     /** @var Illuminate\Contracts\Database\Query\Builder $query */  #https://stackoverflow.com/a/69580333/11297747
    //     $query->where('status', 'public');
    //   }])->where('username', $param)->orWhere('id_user', $param)->first();
    // }

    if (!$user) {
      return $this->fail('dashboard', "User not found");
    }

    $data['user'] = $user;
    $data['jumlahPesan'] = $this->getJumlahPesan();
    $pesan = $this->getPesan();
    $groupedPesan = $pesan->groupBy('id_pengirim');
    $data['pesan'] = $pesan;
    $data['pesanGrup'] = $groupedPesan->all();
    $data['title'] = $user->username . " ($user->fullname)";

    return view('user.detail', $data);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function account()
  {
    $data['title'] = 'Edit Profil Saya';

    $data['user'] = User::where('id_user', Auth::id())->where('username', Auth::user()->username)->first();
    $data['jumlahPesan'] = $this->getJumlahPesan();
    $pesan = $this->getPesan();
    $groupedPesan = $pesan->groupBy('id_pengirim');
    $data['pesan'] = $pesan;
    $data['pesanGrup'] = $groupedPesan->all();

    return view('user.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, User $user)
  {
    $idEdit = Auth::id();

    if ($user->id_user != $idEdit) {
      abort(404);
    }

    $validated = $request->validated();

    $validated = $request->safe()->only(['fullname', 'username', 'email', 'password', 'pp']);

    $checkIfUserProviededAvatar = session('isNewAvatar');
    $newAvatar = $validated['pp'] ?? null;
    $path = 'users/' . Auth::id();

    if (Storage::disk('public')->exists(Auth::user()->pp) && $checkIfUserProviededAvatar && !is_null($newAvatar)) {
      Storage::delete(Auth::user()->pp);
    }

    // dd($newAvatar);

    if (!is_null($newAvatar)) {
      $validPathPP = Storage::disk('public')->put($path, $newAvatar);
      $validated['pp'] = $validPathPP;
    }

    if (isset($validated['password'])) {
      $validated['password'] = Hash::make($request->input('password'));
    }

    $user->update($validated);

    session()->forget('isNewAvatar');

    return $this->flashMessage('info', ['account.settings'], "Profile updated successfully — <a href='/user/$idEdit' class='underline hover:no-underline'>view your profile.</a>");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $user->files()->delete();
    Storage::deleteDirectory('users/' . $user->id_user);
    $user->delete();
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('signin');
  }

  public function ajax()
  {
    $query = request('q');
    $users = User::where('username', 'like', "%$query%")->where('username', '!=', Auth::user()->username)->take(5)->get();
    return response()->json([
      'dataUsers' => $users
    ]);
  }
}
