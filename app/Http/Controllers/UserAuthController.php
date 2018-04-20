<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class UserAuthController extends Controller {

    protected $userAuth;

    /**
     * The relations to eager load on every query.
     * @var array
     */
    protected $with = ['person', 'categories', 'courses'];

    /**
     * Create a new controller instance.
     * @param \Illuminate\Contracts\Auth\Guard $guard
     * @return void
     */
    public function __construct(Guard $guard) {
        $this->userAuth = $guard->user();
    }

    /**
     * Get profile for user auth
     * @return \Illuminate\Http\JsonResponse
     */
    public function show() {

        return response()->json($this->userAuth->load($this->with));
    }

    /**
     * Update profile for user auth
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request) {

        $this->validate($request, ['first_name' => 'string|min:1|max:60', 'last_name' => 'string|min:1|max:60', 'document_type_id' => 'integer|min:1|max:2', 'cell_phone' => 'numeric', 'phone' => 'numeric', 'document' => 'string',]);

        $person = $this->userAuth->person;
        $person->fill($request->all());
        $person->save();

        return response()->json($person);
    }

    /**
     * Update adrress for user auth
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAdress(Request $request) {

        $this->validate($request, ['city_id' => 'integer', 'adress_type_id' => 'integer|min:1|max:2', 'location' => 'string|min:1|max:60',]);

        $adress = Adress::firstOrNew(['person_id' => $this->userAuth->person->id]);
        $adress->fill(array_merge($request->all(), ['person_id' => $this->userAuth->person->id]));
        $adress->save();

        return response()->json($adress);
    }

    /**
     * Get categories for user auth
     * @return \Illuminate\Http\JsonResponse
     */
    public function categories() {

        $data = $this->userAuth->categories;

        return response()->json(['data' => $data]);
    }

    /**
     * Update categories for user auth
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCategories(Request $request) {

        $this->userAuth->categories()->delete();

        foreach ($request->input('categories') as $category) {
            $this->userAuth->categories()->create(['category_id' => $category]);
        }

        $this->userAuth->first_time = false;
        $this->userAuth->save();

        return response()->json(['data' => $this->userAuth->categories]);

    }

    public function courses() {

        $data = $this->userAuth->courses()->latest('updated_at')->get();

        return response()->json(['data' => $data]);
    }

    public function updateCourses(Request $request) {

        $this->validate($request, ['course_id' => 'required',]);

        $name = $request->input('course_id');

        $var = $this->userAuth->courses()->firstOrNew(['course_id' => $name]);

        $var->touch();

        return response()->json(['data' => $this->userAuth->courses()->oldest('updated_at')->get()]);
    }

    public function login(Request $request) {

        $history = $this->userAuth->history()->create(['event_history_type_id' => 1, 'record_id' => 0]);

        return response()->json($history);
    }

    public function webinar(Request $request) {

        $this->validate($request, ['webinar_id' => 'required']);

        $history = $this->userAuth->history()->create(['event_history_type_id' => 2, 'record_id' => $request->input('webinar_id')]);

        return response()->json($history);
    }

}
