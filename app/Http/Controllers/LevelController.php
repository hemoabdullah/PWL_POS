<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class LevelController extends Controller
{
    public function page() {
        $levels = Level::all();
        $metadata = [
            'pageTitle' => 'Levels',
            'breadcrumbs' => [
                [
                    'name' => 'Levels',
                    'route' => 'levels.page'
                ],
                [
                    'name' => 'List',
                    'route' => '#'
                ],
            ]
        ];

        return view('pages.level.index', compact('levels', 'metadata'));
    }

    public function storePage() {
        $levels = Level::all();
        $metadata = [
            'pageTitle' => 'Create Level',
            'breadcrumbs' => [
                [
                    'name' => 'Levels',
                    'route' => 'levels.page'
                ],
                [
                    'name' => 'Create',
                    'route' => '#'
                ],
            ]
        ];

        return view('pages.level.store', compact('metadata', 'levels'));
    }

    public function updatePage(string $id) {
        $level = Level::findOrFail($id);
        $metadata = [
            'pageTitle' => 'Update Level',
            'breadcrumbs' => [
                [
                    'name' => 'Levels',
                    'route' => 'levels.page'
                ],
                [
                    'name' => 'Update',
                    'route' => '#'
                ],
            ]
        ];

        return view('pages.level.update', compact('metadata', 'level'));
    }

    public function list(Request $request)
    {
        try {
            $levels = Level::select(['level_id', 'level_code', 'level_name', 'created_at']);
    
            return DataTables::eloquent($levels)
                ->addIndexColumn()
                ->addColumn('actions', function ($level) {
                    return '
                        <div class="btn-group">
                            <a href="'.route('levels.show', $level->level_id).'" class="btn btn-sm btn-primary">View</a>
                            <a href="'.route('levels.update-page', $level->level_id).'" class="btn btn-sm btn-warning">Edit</a>
                            <form action="'.route('levels.delete', $level->level_id).'" method="POST" class="d-inline">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                            </form>
                        </div>
                    ';
                })
                ->rawColumns(['actions'])
                ->toJson();
        } catch (\Exception $e) {
            Log::error('DataTables Error: '.$e->getMessage());
            return response()->json([
                'error' => 'Error loading data'
            ], 500);
        }
    }

    public function store(LevelRequest $request) {
        $validatedData = $request->validated();

        Level::create([
            'level_code' => $validatedData['level_code'],
            'level_name' => $validatedData['level_name'],
        ]);

        return redirect()->route('levels.page')->with('success', 'Level created successfully.')->withInput($request->only('level_code', 'level_name'));
    }

    public function storeAjax(LevelRequest $request) {
        if (!$request->validated()) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create level. Please check again your data.',
                'errors' => $request->errors(),
            ]);
        }

        $validatedData = $request->validated();
        Level::create([
            'level_code' => $validatedData['level_code'],
            'level_name' => $validatedData['level_name'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Level created successfully.',
            'data' => $validatedData
        ]);
    }

    public function show(string $id) {
        $level = Level::findOrFail($id);
        $metadata = [
            'pageTitle' => 'Level Details',
            'breadcrumbs' => [
                [
                    'name' => 'Levels',
                    'route' => 'levels.page'
                ],
                [
                    'name' => 'Details',
                    'route' => '#'
                ],
            ]
        ];

        return view('pages.level.show', compact('level', 'metadata'));
    }

    public function showAjax(string $id) {
        $level = Level::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Level details found.',
            'data' => $level
        ]);
    }

    public function update(LevelRequest $request, string $id) {
        $validatedData = $request->validated();

        $level = Level::findOrFail($id);
        $level->update([
            'level_code' => $validatedData['level_code'],
            'level_name' => $validatedData['level_name'],
        ]);

        return redirect()->route('levels.page')->with('success', 'Level updated successfully.')->withInput($request->only('level_code', 'level_name'));
    }

    public function updateAjax(LevelRequest $request, string $id) {
        if (!$request->validated()) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update level. Please check again your data.',
                'errors' => $request->errors(),
            ]);
        }

        $validatedData = $request->validated();

        $level = Level::findOrFail($id);
        $level->update([
            'level_code' => $validatedData['level_code'],
            'level_name' => $validatedData['level_name'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Level updated successfully.',
            'data' => $validatedData
        ]);
    }

    public function delete(string $id) {
        $level = Level::findOrFail($id);
        $level->delete();

        return redirect()->route('levels.page')->with('success', 'Level deleted successfully.');
    }

    public function deleteAjax(string $id) {
        $level = Level::findOrFail($id);
        $level->delete();

        return response()->json([
            'success' => true,
            'message' => 'Level deleted successfully.',
            'data' => $level
        ]);
    }
}
