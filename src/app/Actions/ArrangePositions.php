<?php

namespace App\Actions;

class ArrangePositions
{
    public static function run(int $id)
    {

         DB::update("
            with RankedProposals as (
                select id, 
                    row_number() over (order by hours) as p
                from proposals
                where project_id = ?
            )
            update proposals
            set position = (select p from RankedProposals where proposals.id = RankedProposals.id)
            where project_id = ?
        ", [$project->id, $project->id]);
       
    }
}