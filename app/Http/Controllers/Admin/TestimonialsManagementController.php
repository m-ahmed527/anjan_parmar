<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestimonialRequest;
use App\Http\Requests\Admin\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialsManagementController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::all();
        return view('screens.admin.testimonial-management.index', get_defined_vars());
    }

    public function create(): View
    {
        return view('screens.admin.testimonial-management.create');
    }

    function store(StoreTestimonialRequest $request)
    {
        try {
            DB::beginTransaction();
            $testimonial = Testimonial::create($request->sanitized());
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Testimonial created successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('screens.admin.testimonial-management.edit', get_defined_vars());
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        try {
            DB::beginTransaction();
            $testimonial->update($request->sanitized());
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Testimonial updated successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function delete(Request $request, Testimonial $testimonial)
    {
        try {
            DB::beginTransaction();
            $testimonial->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Testimonial deleted successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
