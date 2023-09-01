<template>
    <div>
        <input
            type="text"
            v-model="keyword"
            placeholder="Search job title, address or job position"
            v-on:keyup="SearchJobs"
            class="mr-3 form-control border px-4"
        />

        <div
            class="card-footer"
            v-if="results.length"
            style="
                position: absolute;
                z-index: 12;
                width: 100%;
                left: 0;
                right: 0;
                height: auto;
                background: transparent;
                /* border: 2px solid#ccc;
                background: #fff; */
            "
        >
            <div
                class="list-group"
                style="
                    height: 350px !important;
                    border: 1px solid#efefef;
                    overflow: auto;
                    -webkit-box-shadow: 4px 0 40px 0 rgba(0, 0, 0, 0.1);
                    box-shadow: 4px 0 40px 0 rgba(0, 0, 0, 0.1);
                    background: #fff;
                "
            >
                <a
                    :href="'/job/' + result.id + '/' + result.slug + '/'"
                    class="list-group-item list-group-item-action"
                    aria-current="true"
                    v-for="result in results"
                >
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Job Title: {{ result.title }}</h5>
                        <!-- <small>{{ result.created_at }}</small> -->
                    </div>
                    <small class="badge bg-success badge-primary"
                        >Job Position: {{ result.position }}</small
                    >
                    <p style="color: #111; font-size: 14px; margin-bottom: 0">
                        Job Address: {{ result.address }}
                    </p>
                </a>
            </div>
        </div>
    </div>
</template>
<style>
.list-group a:hover {
    background: #e9ecef !important;
}
</style>

<script>
import axios from "axios";

export default {
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            keyword: "",
            results: [],
        };
    },
    methods: {
        SearchJobs() {
            this.results = [];
            if (this.keyword.length > 1) {
                axios
                    .get("/jobfinder/jobs/search", {
                        params: { keyword: this.keyword },
                    })
                    .then((response) => {
                        this.results = response.data;
                    });
            }
        },
    },
};
</script>
