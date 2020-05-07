<?php

namespace App\Http\Controllers;

use App\Artifact;
use App\Http\Requests\CreateArtifactRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArtifactController extends Controller
{
    /**
     * Display list of Artifacts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $artifacts = Artifact::all();

        return response()->view('artifacts.index', ['artifacts' => $artifacts]);
    }

    /**
     * Page for adding new artifact
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('artifacts.create');
    }

    /**
     * Store new artifact
     *
     * @param CreateArtifactRequest $request
     * @return void
     */
    public function store(CreateArtifactRequest $request)
    {
        $artifactData = $request->validated();

        $attributesCollection = collect(explode(';', $artifactData['attributes']));
        $attributesCollection->transform(function ($item) {
            $attribute = explode(':', $item);
            return [
                'name' => trim($attribute[0]),
                'value' => trim($attribute[1])
            ];
        });

        $modifiersCollection = collect(explode(PHP_EOL, $artifactData['modifiers']));
        $modifiersCollection->transform(function ($item) {
            return trim($item);
        });

        $path = $request->file('image')->store('images/artifacts', 'public');

        $artifactData['attributes'] = $attributesCollection->toArray();
        $artifactData['modifiers'] = $modifiersCollection->toArray();
        $artifactData['image'] = basename($path);

        Artifact::create($artifactData);

        return redirect()->back()->with('message', 'Artifact was successfully added!!!');
    }
}
