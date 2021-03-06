<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.show')
            ->with('profiles', ProfileService::getProfiles());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');

        return view('profile.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create');

        ProfileService::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'profile_photo_id' => $request->profilePhotoId,
            'profile_file_id' => $request->profileFileId,
            'date_of_birth' => $request->dateOfBirth,
            'city' => $request->city,
            'job_type' => $request->jobType,
            'available' => $request->available,
        ]);

        return redirect('index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = ProfileService::getProfile($id);
        $profilePhoto = ProfilePhotoService::getProfilePhoto($id);
        $profileFile = ProfileFileService::getProfileFile($id);

        return view('profile.single')
            ->with('profile', $profile)
            ->with('profilePhoto', $profilePhoto)
            ->with('profileFile', $profileFile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit');

        return view('profile.edit')
            ->with('profile', ProfileService::getProfile($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('edit');

        $profileData = [
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'date_of_birth' => $request->dateOfBirth,
            'city' => $request->city,
            'job_type' => $request->jobType,
            'available' => $request->available,
        ];

        ProfileService::update($profileData, $id);

        return redirect('profile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete');

        ProfileService::delete($id);

    }
}
