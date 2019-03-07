<?php

namespace Main;

class View {
    function ShowPage($f3){
        $f3->set('title','iBooks-Online.');

    	$countEntries = (new \Book\Model)->SelectAllBooksCount($f3);
    	$entry_on_page = 9;

		$max_pages_list = 5;

		if ($countEntries%$entry_on_page==0){
			$pages = floor($countEntries[0]["COUNT(*)"]/$entry_on_page);
		} else {
			$pages = ceil($countEntries[0]["COUNT(*)"]/$entry_on_page);
		}

		$allPages = array();

		for ($i=0; $i <$pages ; $i++) {
			$allPages[$i] = $i + 1;
		}


		$f3->set('allPages', $allPages);

        echo \Template::instance()->render('UI/index.html');
    }

    function ShowSearchPage($f3){
          echo \Template::instance()->render('UI/search.html');
    }
}
