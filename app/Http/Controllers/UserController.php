<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Models\Metadata;
use App\Models\User;
use App\Http\Requests\UserUpdateRequest;


class UserController extends Controller
{
    public function show(User $user)
    {
        $users = User::all();
        return view('users/index', [
            'user' => $user,
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store(UserFormRequest $request)
    {
        $validated_data = $request->validated();
        $metadata = new Metadata([
            'name' => $validated_data['meta_name'],
            'value' => $validated_data['meta_value']
        ]);
        $user = User::create($validated_data);
        if(!empty($metadata->name) && !empty($metadata->value)){
             $user->metadata()->save($metadata);
             $metadata->save();
        }
        return redirect()->route('users.show', $user->id);
    }

    public function edit(User $user) {
        return view('users/edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user, UserUpdateRequest $request) {
        $validated_data = $request->validated();
        $request->validate([
            'name' => 'required|unique:users,name,' . $user->id,
        ]);
        $metadata = new Metadata([
            'name' => $validated_data['meta_name'],
            'value' => $validated_data['meta_value']
        ]);
        
        $user->fill($request->all());
         $user->save();
         if(!empty($metadata->name) && !empty($metadata->value)){
            $user->metadata()->save($metadata);
            $metadata->save();
        }
        return redirect()->route('users.show', $user->id);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('main');
    }

    public function hire($boss,$employee)
    {
        $employer = User::find($boss);
        $worker = User::find($employee);

        $employer->employees()->save($worker);
        return redirect()->route('users.show', $employer->id);

    }
    public function unhire($boss,$employee)
    {
        $employer = User::find($boss);
        $worker = User::find($employee);

        $worker->boss()->dissociate();
        $worker->save();
        return redirect()->route('users.show', $employer->id);

    }
}