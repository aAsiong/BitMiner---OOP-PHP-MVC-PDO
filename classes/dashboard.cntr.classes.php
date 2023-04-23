<?php 

Class dashboardcntr extends dashboardmdl {

    public function gtInfo($id) {
        $details = $this->gtRcrds($id);
        return $details;
    }
    
}

?>