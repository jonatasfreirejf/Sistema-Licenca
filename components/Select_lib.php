<?php
	/**
	 * summary
	 */
	class Select_Render
	{
	    /**
	     * summary
	     */
	    public function __construct($options ,$selected_option)
	    {
	    	echo "<option>" .$selected_option. "</option>";
	        foreach ($options as $selected) {
	        	if($selected != $selected_option){
	        		echo "<option>" .$selected. "</option>";
	        	}

	        }
	    }
	}
	
?>