<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3 text-center ">
          <p v-if="card.user_plan.over_limit">You've hit your item limit! Please adjust your subscription or remove some items</p>
          <p v-if="card.user_plan.over_collection_limit">You've hit your collection limit! Please adjust your subscription or remove some collections</p>
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
