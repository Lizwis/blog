<template>
    <div>
        <el-rate
            v-model="value"
            disabled
            show-score
            text-color="#ff9900"
            score-template="{value} points"
        >
        </el-rate>
    </div>
</template>

<script>
export default {
    name: "ratepost",
    props: ["post_id"],
    data() {
        return {
            post: this.post_id,
            value: ""
        };
    },

    mounted() {
        axios.get(`/api/rating/${this.post}`).then(response => {
            this.value = response.data.rating;
        });
    }
};
</script>
