<?php

namespace App\Traits;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToAttachments
{
    public function attachments(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Attachment::class,
                'attachments_posts',
                'post_id',
                'attachment_id')
            ->withTimestamps();
    }
}
