<?php

class CobaController extends RController
{
	/**
	 * Declares class-based actions.
	 */
	public function filters()
	{
	    return array(
	       'rights', // perform access control for CRUD operations
	    );
	}

	public function actionTest()
	{
		echo "hehe";
	}
	
}