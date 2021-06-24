<template>
  <div class="mb-12">
    <section class="hero is-medium is-primary is-bold mb-6">
      <div class="hero-body">
        <div class="container py-4">
          <h1 class="title">GitHub Trending Repositories</h1>
          <h4 class="subtitle">using Vue JS, REST API &amp; Laravel</h4>
        </div>
      </div>
    </section>
    <div class="container">
      <!-- search start -->
      <div class="header py-3">
        <form v-on:submit.prevent="thisRepo" class="form-outline has-search">
          <i class="fab fa-github-alt form-control-feedback"></i>
          <input
            v-model="keyword"
            type="search"
            id="form1"
            class="form-control"
            placeholder="Type query"
            aria-label="Search"
          />
        </form>
      </div>

      <!-- search end -->
      <div v-if="show" class="row">
        <div v-for="repo in repos" v-bind:key="repo.id" class="col-md-6 py-3">
          <div class="card p-3">
            <div class="d-flex flex-row mb-3">
              <img
                v-bind:src="'' + repo.owner.avatar_url + ''"
                width="70"
                class="circle"
              />
              <div class="d-flex flex-column ml-2">
                <a :href="'https://github.com/' + repo.full_name" target="_blank">{{
                  repo.full_name
                }}</a
                ><span
                  v-if="repo.language"
                  class="text-black-50"
                  v-bind:class="'' + repo.language + ''"
                  >{{ repo.language }}</span
                ><span class="ratings"
                  >Size: {{ Math.round(repo.size / 1024) }} KB</span
                >
              </div>
            </div>
            <h6>{{ repo.description }}</h6>
            <div class="d-flex justify-content-between install mt-3">
              <span
                ><i class="fas fa-star"></i> {{ repo.stargazers_count }} |
                <i class="fas fa-eye"></i> {{ repo.watchers }}</span
              ><span class="text-primary"
                ><i class="fas fa-history"></i> {{ repo.updated_at }}</span
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="py-4 justify-content-center mb-4" aria-label="...">
      <ul v-if="pagination" class="pagination">
        <li v-if="page == 1" class="page-item disabled">
          <a
            class="page-link"
            v-on:click="prevPage()"
            href="#"
            tabindex="-1"
            aria-disabled="true"
            ><span aria-hidden="true">&laquo;</span></a
          >
        </li>
        <li v-if="page != 1" class="page-item">
          <a
            class="page-link"
            v-on:click="prevPage()"
            href="#"
            tabindex="-1"
            aria-disabled="false"
            ><span aria-hidden="true">&laquo;</span></a
          >
        </li>

        <li
          v-for="n in maxPage"
          :key="n"
          v-bind:class="{
            'page-item': page != n,
            'page-item active': page === n,
          }"
          aria-current="page"
        >
          <a v-on:click="currentPage(n)" class="page-link" href="#">{{ n }}</a>
        </li>

        <li v-if="page != total" class="page-item">
          <a v-on:click="nextPage()" class="page-link" href="#"
            ><span aria-hidden="true">&raquo;</span></a
          >
        </li>
        <li v-if="page == total" class="page-item disabled">
          <a
            v-on:click="nextPage()"
            class="page-link"
            href="#"
            aria-disabled="true"
            ><span aria-hidden="true">&raquo;</span></a
          >
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  data() {
    return {
      status: "",
      keyword: "",
      total: "",
      repos: [],
      show: false,
      pagination: false,
      error: false,
      page: 1,
      n: 0,
      maxPage: 10,
      searchWord: "",
      page: "",
      query: "",
      total: "",
      pages: "",
    };
  },
  created() {
    if (this.keyword) {
      this.searchRepo();
    } else {
      this.trendingRepo();
    }
  },
  methods: {
    thisRepo() {
      if (this.keyword) {
        this.searchRepo();
      } else {
        this.trendingRepo();
      }
    },
    trendingRepo(e) {
      if (e) {
        e.preventDefault();
        this.page = 1;
      }
      this.page = this.page;
      this.query =
        "https://api.github.com/search/repositories?o=desc&q=trending&sort=stars&per_page=20&page=" +
        this.page +
        "&type=Repositories";
      axios
        .get(this.query)
        .then((response) => {
          this.total = response.data.total_count;
          this.repos = response.data.items;
          this.pages = Math.round(response.data.total_count / 20);
          console.log(response.data);
          if (this.total == 0) {
            this.error = true;
            this.show = false;
            this.pagination = false;
            this.keyword = "";
            var errorMessage = "<span>Repository not found</span>";
            M.toast({ html: errorMessage });
          } else {
            this.error = false;
            this.show = true;
            this.pagination = true;
          }
          if (this.total <= 20) {
            this.pagination = false;
          }
        })
        .catch(function (error) {
          this.status = "An error occured. " + error;
        });
    },
    searchRepo(e) {
      if (e) {
        e.preventDefault();
        this.page = 1;
      }
      this.searchWord = this.keyword;
      this.page = this.page;
      this.query =
        "https://api.github.com/search/repositories?o=desc&sort=stars&type=Repositories&per_page=20&page=" +
        this.page +
        "&q=";
      axios
        .get(this.query + this.searchWord)
        .then((response) => {
          this.total = response.data.total_count;
          this.repos = response.data.items;
          this.pages = Math.round(response.data.total_count / 20);
          console.log(response.data);
          if (this.total == 0) {
            this.error = true;
            this.show = false;
            this.pagination = false;
            this.keyword = "";
            var errorMessage = "<span>Repository not found</span>";
            M.toast({ html: errorMessage });
          } else {
            this.error = false;
            this.show = true;
            this.pagination = true;
          }
          if (this.total <= 20) {
            this.pagination = false;
          }
        })
        .catch(function (error) {
          this.status = "An error occured. " + error;
        });
    },
    currentPage(argument) {
      this.page = argument;
      if (this.keyword) {
        this.searchRepo();
      } else {
        this.trendingRepo();
      }
      this.backToTop();
    },
    nextPage() {
      this.page = this.page + 1;
      if (this.keyword) {
        this.searchRepo();
      } else {
        this.trendingRepo();
      }
      this.backToTop();
      this.incrementPagination();
    },
    prevPage() {
      this.page = this.page - 1;
      if (this.keyword) {
        this.searchRepo();
      } else {
        this.trendingRepo();
      }
      this.backToTop();
      if (this.page >= 10) {
        this.decreasePagination();
      }
    },
    incrementPagination() {
      if (this.page > this.maxPage) {
        this.n = this.n + 11;
        this.maxPage = this.maxPage + 10;
      } else {
        this.n = 0;
      }
    },
    decrementPagination() {
      if (this.page < this.maxPage) {
        this.n = this.n - 11;
        this.maxPage = this.maxPage - 10;
      } else {
        this.n = 0;
      }
    },
    backToTop() {
      setTimeout(function () {
        $("html,body").stop().animate(
          {
            scrollTop: 0,
          },
          1500,
          "swing"
        );
      }, 500);
    },
  },
};
</script>


<style>
body {
  font: 15px/1.8 "Poppins", sans-serif !important;
}

.table td,
.table th {
  padding: 20px !important;
}
</style>
