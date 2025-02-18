<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestimonialRequest;
use App\Http\Requests\Admin\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TestimonialsManagementController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::all();
        return view('screens.admin.testimonial-management.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('screens.admin.testimonial-management.create');
    }

    function store(StoreTestimonialRequest $request)
    {
        // dd($request->sanitized());
        $testimonial  = Testimonial::create($request->sanitized());
        if ($testimonial) {
            toastr()->success('Testimonial created successfully.!');
            return redirect()->route('admin.testimonial.index');
        }
        toastr()->error('Something went wrong, try again .');
        return back();
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('screens.admin.testimonial-management.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        if ($testimonial) {
            $testimonial->update($request->sanitized());
            toastr()->success('Testimonial updated successfully.!');
            return redirect()->route('admin.testimonial.index');
        }
        toastr()->error('Something went wrong, try again .');
        return back();
    }

    public function delete(Request $request, Testimonial $testimonial)
    {
        if ($testimonial) {

            $testimonial->delete();
            toastr()->success('Testimonial deleted successfully.!');
            return redirect()->route('admin.testimonial.index');
        }
        toastr()->error('Something went wrong, try again .');
        return back();
    }
}
