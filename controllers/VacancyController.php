<?php

    class VacancyController{

        public function actionAddVacancy(){
            $title = 'Добавление вакансии';

            require_once(ROOT.'/view/vacancies/addVacancy.php');
        
            return true;

        }

        public function actionList($page = 1){
            $title = 'Вакансии';

            $vacancyList = array();
            $vacancyList = Vacancy::getVacancyListByPage($page);

            $total = Vacancy::getTotalVacanciesInList();

            $pagination = new Pagination($total, $page, Project::SHOW_BY_DEFAULT, 'page-');

            require_once(ROOT.'/view/vacancies/index.php');
        
            return true;

        }

        public function actionView($id){

            $vacancyItem = array();

            $vacancyItem = Vacancy::getVacancyItemById($id);

            $title = $vacancyItem['Position'];

            require_once(ROOT.'/view/vacancies/view.php');
        
            return true;

        }

    }
?>