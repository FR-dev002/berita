<?php

namespace App\Http\Controllers\Berita;
use App\Http\Controllers\Controller;
use App\Http\Requests\BeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Models\BeritaCategory;
use App\Models\BeritaTag;


// Repositiry
use App\Repositories\Repository\Berita\BeritaInterface;

class BeritaController extends Controller
{

    private $beritaRepository;

    public function __construct(
        BeritaInterface $beritaRepository
    )
    {
        $this->beritaRepository = $beritaRepository;
    }


    /**
     * @desc get all data tanpa pagination
     */
    public function getAll()
    {
        return $this->beritaRepository->getAll();
    }


    /**
     * @desc get data dengan pagination 5 per page
     */

    public function getAllPagination()
    {
        return $this->beritaRepository->getAllPagination();
    }

    /**
     * @desc store berita into database
     * BeritaRequest "validation for news input form"
     */
    function store(BeritaRequest $request) 
    {
        DB::beginTransaction();

        try {
            $data = [
                'title' => $request->title,
                'sort_title' => $request->sort_title,
                'author' => $request->author,
                'wartawan' => $request->wartawan,
                'description' => $request->description,
                'sort_description' => $request->sort_description,
                'headlines' => $request->headlines ? 1 : 0,
                'publish' => $request->publish ? 1 : 0,
                'publish_at' => $request->publish ? Carbon::now() : null,
                'view' => 0
            ];

            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $destinationImage = storage_path('app/berita');
                $image->move($destinationImage, $imageName);
            }

            if($request->hasFile('thumbnail'))
            {
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time().'.'.$thumbnail->getClientOriginalExtension();
                $destinationImage = storage_path('app/berita');
                $thumbnail->move($destinationImage, $thumbnailName);
            }

            $data['image'] = $imageName;
            $data['thumbnail'] = $thumbnailName;
            $berita = $this->beritaRepository->store($data);
            $beritaID = $berita->id;

            /**
             * construc data untuk berita categori
             */
            $categoryLen = count($request->categories);
            $categories = [];
            for ($i=0; $i < $categoryLen ; $i++) { 
                array_push($categories, ['berita_id' => $beritaID, 'category_id' => $request->categories[$i]]);
            }
            BeritaCategory::insert($categories);

            /**
             * construc data untuk berita tags
             */
            $tagLen = count($request->tags);
            $tags = [];
            for ($i=0; $i < $tagLen ; $i++) { 
                array_push($tags, ['berita_id' => $beritaID, 'tag_id' => $request->tags[$i]]);
            }
            
            BeritaTag::insert($tags);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return $e;
        }

        return response()->json(['status' => 200, 'message' => 'success']);
    }


    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = [
                'title' => $request->title,
                'sort_title' => $request->sort_title,
                'author' => $request->author,
                'wartawan' => $request->wartawan,
                'description' => $request->description,
                'sort_description' => $request->sort_description,
                'headlines' => $request->headlines ? 1 : 0,
                'publish' => $request->publish ? 1 : 0,
                'publish_at' => $request->publish ? Carbon::now() : null,
                'view' => 0
            ];

            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $destinationImage = storage_path('app/berita');
                $image->move($destinationImage, $imageName);
            }

            if($request->hasFile('thumbnail'))
            {
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time().'.'.$thumbnail->getClientOriginalExtension();
                $destinationImage = storage_path('app/berita');
                $thumbnail->move($destinationImage, $thumbnailName);
            }

            $data['image'] = $imageName;
            $data['thumbnail'] = $thumbnailName;
            $berita = $this->beritaRepository->update($data, $request->berita_id);
            $beritaID = $request->berita_id;

            /**
             * construc data untuk berita categori
             */
            BeritaCategory::where('berita_id', $request->berita_id)->delete();

            $categoryLen = count($request->categories);
            $categories = [];
            for ($i=0; $i < $categoryLen ; $i++) { 
                array_push($categories, ['berita_id' => $beritaID, 'category_id' => $request->categories[$i]]);
            }
            BeritaCategory::insert($categories);

            /**
             * construc data untuk berita tags
             */

            BeritaTag::where('berita_id', $request->berita_id)->delete();

            $tagLen = count($request->tags);
            $tags = [];
            for ($i=0; $i < $tagLen ; $i++) { 
                array_push($tags, ['berita_id' => $beritaID, 'tag_id' => $request->tags[$i]]);
            }
            
            BeritaTag::insert($tags);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return $e;
        }

        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $this->beritaRepository->destroy($id);

            BeritaCategory::where('berita_id', $id)->delete();

            BeritaTag::where('berita_id', $id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return $e;
        }

        return response()->json(['status' => 200, 'message' => 'success']);
    }

}
