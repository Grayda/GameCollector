<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3 text-center ">
            <p class="danger" v-if="card.user_plan.over_limit"><b>You've hit your limit of {{ card.user_plan.plan.limit }} items! Please delete some, or switch plans via the Game Collector Patreon!</b></p>
            <p class="danger" v-if="card.user_plan.over_collection_limit"><b>You've hit your collection limit of {{ card.user_plan.plan.collection_limit }} collections! Please delete some, or switch plans via the Game Collector Patreon!</b></p>
            <div v-if="card.user_plan.plan.limit < 0">
              <p>Hi <b>{{ card.user }}</b>, you're on the <b>{{ card.user_plan.plan.name }}</b> plan</p>
              <p>If you want to adjust your plan, visit the Game Collector Patreon</p>
            </div>
            <div v-if="(!card.user_plan.over_limit) && (!card.user_plan.limit < 0)">
              <p>Hi <b>{{ card.user }}</b>, you're on the <b>{{ card.user_plan.plan.name }}</b> plan and you've got <b>{{ card.user_plan.remaining }}</b> items left</p>
              <p>If you want to adjust your plan, visit the Game Collector Patreon</p>
            </div>
        </div>
    </card>
</template>

<script>
export default {
    props: [
        'card',

        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],

    mounted() {
        //
    },
}
</script>
