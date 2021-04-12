<template>
    <div>
        <el-rate
            v-model="value"
            text-color="#ff9900"
            show-score
            @change="submit(value)"
        >
        </el-rate>
    </div>
</template>

<script>
export default {
    name: "postrating",
    props: ["post_id"],
    data() {
        return {
            post: this.post_id,
            value: 0
        };
    },

    methods: {
        submit(value) {
            axios
                .get(`/api/rating/store/${this.post}/${value}`)
                .then(response => {
                    this.success();
                });
        },

        success() {
            const h = this.$createElement;

            this.$notify({
                message: h(
                    "i",
                    { class: "text-success font-weight-bold" },
                    "Thank you for rating Post"
                )
            });
        }
    }
};
</script>
