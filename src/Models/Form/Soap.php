<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Resources\Soap\{ViewSoap,ShowSoap};

class Soap extends Screening
{    
    protected $table = 'unicodes';

    const FLAG_SCREENING = 'Soap';

    public function viewUsingRelation(): array{
        return ['subjectives','objectives','assessments','plans'];
    }

    public function showUsingRelation(): array{
        return ['subjectives','objectives','assessments','plans'];
    }

    public function isUsingService(): bool{
        return false;
    }

    public function subjectives(){
        return $this->hasManyModel('ScreeningHasForm','screening_id')->where('props->form_type','Subjective')->orderBy('props->ordering','asc');
    }
    
    public function objectives(){
        return $this->hasManyModel('ScreeningHasForm','screening_id')->where('props->form_type','Objective')->orderBy('props->ordering','asc');
    }

    public function assessments(){
        return $this->hasManyModel('ScreeningHasForm','screening_id')->where('props->form_type','Assessment')->orderBy('props->ordering','asc');
    }
    
    public function plans(){
        return $this->hasManyModel('ScreeningHasForm','screening_id')->where('props->form_type','Plan')->orderBy('props->ordering','asc');
    }

    public function getViewResource(){return ViewSoap::class;}
    public function getShowResource(){return ShowSoap::class;}
}
