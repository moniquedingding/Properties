<?php

/**
 * Search Controller
 *
 * @author nikki <monique.dingding@gmail.com>
 */

namespace App\Http\Controllers;

use App\Exceptions\APIHttpException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller {

	/**
	 * Clean/Trim input fields
	 * @param  array $fields 
	 * @param  Request $request
	 * @return array         
	 */
	public function cleanFields($fields, $request) {
		$data = [];

		foreach ($fields as $field) {
			$value = $request->json($field);

			if (isset($value)) {
				$data[$field] = trim($request->json($field));
			}
		}
 	
 		return $data;
	}

	/**
	 * Search a property
	 * @return Response json
	 */
	public function search(Request $request) {
		$fields = ['name', 'bedrooms', 'bathrooms', 'storeys', 'garages', 'minPrice', 'maxPrice'];
		$data = $this->cleanFields($fields, $request);

		$prop = DB::table('props')->select('name', 'bedrooms', 'bathrooms', 'storeys', 'garages', 'price');

		if (isset($data['name'])) {
			$prop = $prop->where('name', 'like', '%'.$data['name'].'%');
		}

		if (isset($data['bedrooms'])) {
			$prop = $prop->where('bedrooms', $data['bedrooms']);
		}

		if (isset($data['bathrooms'])) {
			$prop = $prop->where('bathrooms', $data['bathrooms']);
		}

		if (isset($data['storeys'])) {
			$prop = $prop->where('storeys', $data['storeys']);
		}

		if (isset($data['garages'])) {
			$prop = $prop->where('garages', $data['garages']);
		}

		if (isset($data['minPrice']) && isset($data['maxPrice'])) {
			$prop = $prop->whereBetween('price', [$data['minPrice'], $data['maxPrice']]);
		}

		$prop = $prop->get();

		return response()->json(['data' => $prop]);
	}

}
