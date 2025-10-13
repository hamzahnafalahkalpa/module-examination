<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Resources\Soap\{ViewSoap,ShowSoap};

class Soap extends Screening
{    
    protected $table = 'unicodes';

    const FLAG_SCREENING = 'Soap';

    public function viewUsingRelation(): array{
        return ['subjectives','objectives','plans'];
    }

    public function showUsingRelation(): array{
        return ['subjectives','objectives','plans'];
    }

    protected function isUsingService(): bool{
        return false;
    }

    public function subjectives(){
        return $this->hasManyModel('ScreeningHasForm','screening_id')->where('props->form_type','Subjective');
    }
    
    public function objectives(){
        return $this->hasManyModel('ScreeningHasForm','screening_id')->where('props->form_type','Objective');
    }
    
    public function plans(){
        return $this->hasManyModel('ScreeningHasForm','screening_id')->where('props->form_type','Plan');
    }

    public function getViewResource(){return ViewSoap::class;}
    public function getShowResource(){return ShowSoap::class;}
}
