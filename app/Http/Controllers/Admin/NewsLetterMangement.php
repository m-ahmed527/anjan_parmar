<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class NewsLetterMangement extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletters = NewsLetter::latest()->get();
        return view('screens.admin.newsletter-management.index', get_defined_vars());
    }

    public function getNewLetterData()
    {
        $newsletters = NewsLetter::latest()->get();
        $newsletters->map(function ($newsletter) {
            $newsletter->search_key = $newsletter->id . $newsletter->email . $newsletter->agreement ? 'agreed' : 'notagreed';
        });
        return DataTables::of($newsletters)->make(true);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsLetter $newsLetter)
    {
        try {
            DB::beginTransaction();
            $newsLetter->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Newsletter deleted successfully.'
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete newsletter. Please try again later.'
            ], 400);
        }
    }
}
