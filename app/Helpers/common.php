<?php 

function user_avatar_url($user) {
    return url('uploads/user/'.$user->id.'/'.$user->file_avatar);
}