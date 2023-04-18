<?php

namespace App\Http\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService{
    public function store($request){
        $validated = $request->validated();
        $image = $request->file("image");
        $path = null;
        if($image){
            $path = $image->store('images', "public");
            $validated["image"] = $path; 
        }
        $validated["password"] = Hash::make($validated["password"]);
        return User::create($validated);
    }
}