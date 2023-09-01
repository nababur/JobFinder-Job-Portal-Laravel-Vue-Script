<template>
    <div>
        <div class="col-md-12 mb-3 mb-md-0">
            <input
                type="text"
                v-model="keyword"
                placeholder="job title, address or job position"
                v-on:keyup="SearchJobs"
                class="mr-3 form-control border-0 px-4"
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
                    border: 2px solid#ccc;
                    background: #fff;
                "
            >
                <div
                    class="list-group"
                    style="height: 350px !important; overflow: auto"
                >
                    <a
                        :href="'/job/' + result.id + '/' + result.slug + '/'"
                        class="list-group-item list-group-item-action"
                        aria-current="true"
                        v-for="result in results"
                    >
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Title: {{ result.title }}</h5>
                            <!-- <small>{{ result.created_at }}</small> -->
                        </div>
                        <small class="badge bg-success badge-primary"
                            >Job position: {{ result.position }}</small
                        >
                        <p>Address: {{ result.address }}</p>
                    </a>
                </div>
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
                    .get("/jobs/search", { params: { keyword: this.keyword } })
                    .then((response) => {
                        this.results = response.data;
                    });
            }
        },
    },
};
</script>
