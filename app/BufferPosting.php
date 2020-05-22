<?php

namespace Bulkly;

use Illuminate\Database\Eloquent\Model;
use Bulkly\SocialAccounts;
use Bulkly\SocialPostGroups;

class BufferPosting extends Model
{
   public function groupInfo()
    {
        return $this->hasOne(SocialPostGroups::Class, 'id', 'group_id');
    }
   public function accountInfo()
    {
        return $this->hasOne(SocialAccounts::Class, 'id', 'account_id');
    }

}
