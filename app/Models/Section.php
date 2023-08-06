<?php

namespace App\Models;

// 945905
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the module that owns the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Get the quiz associated with the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quiz()
    {
        return $this->hasOne(Quiz::class, 'section_id', 'id');
    }

    public function quizExist()
    {
        $this->id;
    }

    // This section will provide complted detail of a section by all users...
    protected function SectionCompltedByAll()
    {

        return $this->hasMany(CompletedSection::class, 'section_id', 'id');

    }

    // This will provide section if its is complted by the current user...
    public function completedByThisUser()
    {
        $sectionCheck = [
            'is_read' => false,
            'quiz_completed' => false,
            'section_completed' => false,
        ];
        $sectionAvailable = $this->SectionCompltedByAll->where('user_id', auth()->user()->id)->first();

        if ($sectionAvailable) {

            if ($sectionAvailable->is_read) {
                $sectionCheck['is_read'] = true;
            }

            if ($sectionAvailable->quiz_completed) {
                $sectionCheck['quiz_completed'] = true;
            }
        }

        if ($sectionCheck['is_read'] == true && $sectionCheck['quiz_completed'] == true) {
            $sectionCheck['section_completed'] = true;
        }

        return $sectionCheck;

    }

    public function checkPreviousSection()
    {

        $section = $this->module->sections->where('sequence', '<', $this->sequence)->sortByDesc('sequence')->first();

        $module = Module::whichModuleNext();

        if (Module::allModulesCopletedByUser()) {
            $module = $this->module;
        }

        if (! $section) {

            if ($module->id != $this->module->id && $module->sequence < $this->module->sequence) {
                return false;
            }

            return true;
        }

        if ($section->completedByThisUser()['section_completed']) {
            return true;
        }

        return false;

    }

    public function allSectionCompletedByUser()
    {
        $query = DB::table('sections')
            ->join('completed_sections', 'sections.id', '=', 'completed_sections.section_id')
            ->where('sections.module_id', $this->module->id)
            ->where('completed_sections.user_id', auth()->user()->id)
            ->orderBy('sections.sequence', 'desc');

        if ($query->count() == $this->module->sections->count()) {
            return true;
        }

        return false;
    }

    /*
    don't confuse this function with nextSection ,,
    whichSectionIsNext will give use for the user which section we need to start whereas nextSection will provide us simply next section...
    */
    public function whichSectionIsNext()
    {

        $currentSectionSiblings = $this->module->sections;
        //   dd($this->module->sections);
        $query = DB::table('sections')
            ->join('completed_sections', 'sections.id', '=', 'completed_sections.section_id')
            ->where('sections.module_id', $this->module->id)
            ->where('completed_sections.user_id', auth()->user()->id)
            ->where('completed_sections.quiz_completed', '<>', 0)
            ->orderBy('sections.sequence', 'desc')->first();
        //   dd($query);
        if ($query) {

            return self::where('module_id', $this->module->id)->where('sequence', '>', $query->sequence)->orderBy('sequence', 'asc')->first();

        }

        return self::where('module_id', $this->module->id)->where('sequence', '<>', 0)->orderBy('sequence', 'asc')->first();
    }

    public function isItLastSection()
    {

        $lastSection = $this->module->sections->sortByDesc('sequence')->first();

        if ($lastSection->id == $this->id) {

            return true;

        }

        return false;

    }

    public function nextSection()
    {
        return $this->module->sections->where('sequence', '>', $this->sequence)->sortBy(['sequence', 'asc'])->first();
    }

    public function sectionInfoExerpt()
    {
        return substr($this->content, 0, 500);
    }

    // To save manually in the database images will be saved in public folder as section_images/section(sectionId)/ then picture1, picture2,,....
    /*
    for example if section id (this we will get from the database) is 3 and section has 1 images(picture1.jpg) then what how folder will look

    asset(images/section_images/section3/picture1.jpg)
    renaming images name according to the picture1, picture2, ... will make our work easy...

    */
    public function sectionImages()
    {
        if ($this->images) {
            // dd($this->images);
            $images = explode(';', $this->images);
            $imageLinks = [];

            foreach ($images as $imageName) {
                $imageLinks[] = asset('images/section_images/section'.$this->id.'/'.$imageName);
            }

            return $imageLinks;

        }

        return false;
    }
}
