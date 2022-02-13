<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin.user.create', [
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        $addData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'is_admin' => $data['isAdmin'],
            'password' => Hash::make($data['password']),
        ];

        $created = User::create($addData);

        if ($created) {
            return redirect()->route('admin.user.index')
                ->with('success', __('messages.users.created.success'));
        } else {
            return back()->with('error', __('messages.users.created.error'))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        /*
        if (Hash::check($data['password'], $user->password)) {
            $updated = $user->fill([
                'name' => $data['name'],
                'password' =>  Hash::make($data['newPassword']),
            ])->save();
        } else {
            $errors['password'][] = 'Не верно введен текущий пароль';
            return back()->with('error', __('Неверно введен текущий пароль'))->withInput();
        }
*/
        $addData = [
            'name' => $data['name'],
            'is_admin' => $data['isAdmin'],
        ];

        if ($data['newPassword'] != "") {
            $addData['password'] = Hash::make($data['newPassword']);
        }

        $updated = $user->fill($addData)->save();


        if ($updated) {
            return redirect()->route('admin.user.index')
                ->with('success', __('messages.users.updated.success'));
        } else {
            return back()->with('error', __('messages.users.updated.error'))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
          try {
            $user->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            return response()->json('error', 400);
        }
    }
}
