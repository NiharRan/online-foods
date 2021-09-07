<template>
  <div class="app-content content ecommerce-application">
    <navbar></navbar>
    <div class="content-wrapper">
      <div class="content-body d-flex">
        <sidebar
          :categories="categories"
          :brands="brands"
          @searchFromNabvar="searchFromNabvar"
        ></sidebar>

        <div class="ecommerce">
          <!-- Ecommerce Content Section Starts -->
          <section id="ecommerce-header">
            <div class="row">
              <div class="col-sm-12">
                <div class="ecommerce-header-items">
                  <div class="result-toggler">
                    <button
                      class="navbar-toggler shop-sidebar-toggler"
                      type="button"
                      data-toggle="collapse"
                    >
                      <span class="navbar-toggler-icon d-block d-lg-none"
                        ><i class="feather icon-menu"></i
                      ></span>
                    </button>
                    <div class="search-results">16285 results found</div>
                  </div>
                  <div class="view-options">
                    <select
                      class="price-options form-control"
                      id="ecommerce-price-options"
                    >
                      <option selected>Featured</option>
                      <option value="1">Lowest</option>
                      <option value="2">Highest</option>
                    </select>
                    <div class="view-btn-option">
                      <button
                        class="btn btn-white view-btn grid-view-btn"
                        :class="[is_grid_active ? 'active' : '']"
                        @click="changeProductDisplay('grid-view')"
                      >
                        <i class="feather icon-grid"></i>
                      </button>
                      <button
                        class="btn btn-white list-view-btn view-btn"
                        :class="[is_grid_active ? '' : 'active']"
                        @click="changeProductDisplay('list-view')"
                      >
                        <i class="feather icon-list"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Ecommerce Content Section Starts -->
          <!-- background Overlay when sidebar is shown  starts-->
          <div class="shop-content-overlay"></div>
          <!-- background Overlay when sidebar is shown  ends-->

          <!-- Ecommerce Search Bar Starts -->
          <section id="ecommerce-searchbar">
            <div class="row mt-1">
              <div class="col-sm-12">
                <fieldset class="form-group position-relative">
                  <input
                    type="text"
                    class="form-control search-product"
                    id="iconLeft5"
                    placeholder="Search here"
                    v-model="search.query"
                    @keyup="fetchProducts"
                  />
                  <div class="form-control-position">
                    <i class="feather icon-search"></i>
                  </div>
                </fieldset>
              </div>
            </div>
          </section>

          <!-- Ecommerce Products Starts -->
          <section
            id="ecommerce-products"
            v-if="products && products.data.length > 0"
            :class="display_class"
          >
            <div
              class="card ecommerce-card"
              v-for="(product, key) in products.data"
              :key="key"
            >
              <div class="card-content">
                <a :href="product.product_url">
                  <div class="item-img text-center">
                    <img
                      class="img-fluid"
                      :src="product.product_image"
                      alt="img-placeholder"
                    />
                  </div>
                  <div class="card-body">
                    <div class="item-wrapper">
                      <div class="item-rating">
                        <div class="badge badge-primary badge-md">
                          <span>4</span> <i class="feather icon-star"></i>
                        </div>
                      </div>
                      <div>
                        <h6 class="item-price">${{ product.price }}</h6>
                      </div>
                    </div>
                    <div class="item-name">
                      <span
                        >{{ product.product_type.name }} -
                        {{ product.title }}</span
                      >
                      <p class="item-company">
                        By
                        <span class="company-name">{{
                          product.brand.name
                        }}</span>
                      </p>
                    </div>
                    <div>
                      <p class="item-description"></p>
                    </div>
                  </div>
                </a>
                <div class="item-options text-center">
                  <div class="item-wrapper">
                    <div class="item-rating">
                      <div class="badge badge-primary badge-md">
                        <span>4</span> <i class="feather icon-star"></i>
                      </div>
                    </div>
                    <div class="item-cost">
                      <h6 class="item-price">${{ product.price }}</h6>
                    </div>
                  </div>
                  <div class="wishlist">
                    <i class="fa fa-heart-o"></i> <span>Wishlist</span>
                  </div>
                  <div class="cart">
                    <i class="feather icon-shopping-cart"></i>
                    <span class="add-to-cart">Add to cart</span>
                    <a href="app-ecommerce-checkout" class="view-in-cart d-none"
                      >View In Cart</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Ecommerce Products Ends -->

          <!-- Ecommerce Pagination Starts -->
          <section id="ecommerce-pagination">
            <div class="row">
              <div class="col-sm-12">
                <pagination
                  v-if="products && products.data.length > 0"
                  :links="products.links"
                  @changePage="changePage"
                ></pagination>
              </div>
            </div>
          </section>
          <!-- Ecommerce Pagination Ends -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      products: null,
      categories: [],
      brands: [],
      search: {
        page: 1,
        price_limit: "",
        category: "",
        brands: [],
        query: "",
      },
      display_class: "grid-view",
      is_grid_active: true,
    };
  },
  methods: {
    searchFromNabvar: function (search_data) {
      this.search.category = search_data.category;
      this.search.brands = search_data.brands;
      this.search.price_limit = `${search_data.start},${search_data.end}`;
      this.fetchProducts();
    },
    changePage: function (page) {
      this.search.page = page;
      this.fetchProducts();
    },
    fetchProducts: async function () {
      let url = `/api/products/?query=${this.search.query}&page=${this.search.page}&category=${this.search.category}`;
      let brands = this.search.brands.toString();
      url += `&brands=${brands}&price_limit=${this.search.price_limit}`;
      const { data } = await axios.get(url);
      if (data) {
        this.products = data;
      }
    },
    changeProductDisplay: function (display_class) {
      this.display_class = display_class;
      this.is_grid_active = display_class == "grid-view";
    },
    fetchCategories: async function () {
      const { data } = await axios.get("/api/categories");
      if (data) {
        this.categories = data;
      }
    },
    fetchBrands: async function () {
      const { data } = await axios.get("/api/brands");
      if (data) {
        this.brands = data;
      }
    },
  },
  created() {
    this.fetchCategories();
    this.fetchBrands();
    this.fetchProducts();
  },
};
</script>