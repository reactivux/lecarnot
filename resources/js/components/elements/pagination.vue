<template>
  <div v-if="pagination" class="tf__pagination mt_50">
    <div class="row">
      <div class="col-12">
        <nav>
          <ul v-if="pagination.last_page != 1" class="pagination">
            <li v-if="pagination.current_page > 1" @click="changePage(pagination.current_page - 1)" class="page-item">
              <a class="page-link first_last prev d-flex justify-center align-content-end align-items-center"
                href="javascript:void(0);">
              </a>
            </li>
            <li class="page-item" v-for="page in numberPages" :class="{ active: page == pagination.current_page }"
              @click="changePage(page)">
              <a class="page-link" href="javascript:void(0);">{{ page }}</a>
            </li>
            <li v-if="pagination.current_page < pagination.last_page" class="page-item"
              @click="changePage(pagination.current_page + 1)">
              <a class="page-link first_last next d-flex justify-center align-content-end align-items-center"
                href="javascript:void(0);">
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["pagination"],
  methods: {
    changePage(pageNumber) {
      this.pagination.current_page = pageNumber;
      this.$emit("paginate-event", pageNumber);
    }
  },
  computed: {
    numberPages() {
      if (this.pagination) {
        if (!this.pagination.to) {
          return [];
        }
        let from = this.pagination.current_page - 4;
        if (from < 1) {
          from = 1;
        }
        let to = from + 5;
        if (to >= this.pagination.last_page) {
          to = this.pagination.last_page;
        }
        let pagesArray = [];
        for (let page = from; page <= to; page++) {
          pagesArray.push(page);
        }
        return pagesArray;
      }
    }
  }
}
</script>
