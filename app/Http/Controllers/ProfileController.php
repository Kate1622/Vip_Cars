<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
	public function updatePhoto(Request $request)
	{
		$this->validate($request, [
			'photo' => 'required|image'
		]);

		$file = $request->file('photo');
		$extension = $file->getClientOriginalExtension();
		$fileName = auth()->id() . '.' . $extension;
		$path = public_path('images/usuario/'.$fileName);

			Image::make($file)->fit(144, 144)->save($path);

		$user = auth()->user();
		$user->photo_extension = $extension;
		$saved = $user->save();

		$data['success'] = $saved;
		$data['path'] = $user->getAvatarUrl() . '?' . uniqid();

		return $data;
	}


    public function getimagen(Request $request)
	{
		$user = auth()->user();

		$personal = Personal::findOrFail($user->PER_Id);
		if($personal->PER_Foto == ""){
			$ruta = 'storage/archivos/personal/foto/usuario.png?' . uniqid();
		}else{
			$ruta = 'storage/archivos/personal/foto/'.$personal->PER_Foto.'?'. uniqid();
		}

		return response()->json(['ruta'=>$ruta]);
	}



}
