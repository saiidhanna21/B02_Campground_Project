<?php
function flash($message,$error){
    if(!$error){
        return '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            '.$message.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            '.$message.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>