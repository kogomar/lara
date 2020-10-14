<?php


namespace App\Services;

use Illuminate\Support\Facades\DB;


class ProfileService
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getProfiles()
    {
        return  DB::table('profile')->select('profile.*')->paginate(10);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public static function getProfile($id)
    {
        return DB::table('profile')
            ->select('profile.*', 'profile_files.file_name', 'profile_photos.photo_name')
            ->join('profile_files', 'profile_file.id', '=', 'profile.profile_file_id')
            ->join('profile_photos', 'profile_photos.id', '=', 'profile.profile_photo_id')
            ->first();
    }

    /**
     * @param $data
     * @param $id
     */
    public static function update($data, $id)
    {
        DB::table('profile')
            ->where('id', $id)
            ->update([
                'first name' => $data['firstName'],
                'last name' => $data['lastName']
            ]);
    }

    /**
     * @param $data
     * @return bool
     */
    public static function create($data)
    {
        return DB::table('profile')->insert([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'profile_photo_id' => $data['profilePhotoId'],
            'profile_file_id' => $data['profileFileId'],
            'date_of_birth' => $data['dateOfBirth'],
            'city' => $data['city'],
            'job_type' => $data['jobType'],
            'available' => $data['available'],
        ]);
    }

    /**
     * @param int $id
     * @return int
     */
    public static function delete(int $id)
    {
        return DB::table('profile')->where('id', '=', $id)->delete();
    }
}
