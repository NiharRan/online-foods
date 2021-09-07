<template>
  <!-- Ecommerce Sidebar Starts -->
  <div class="sidebar-shop" id="ecommerce-sidebar-toggler">
    <div class="row">
      <div class="col-sm-12">
        <h6 class="filter-heading d-none d-lg-block">Filters</h6>
      </div>
    </div>
    <span class="sidebar-close-icon d-block d-md-none">
      <i class="feather icon-x"></i>
    </span>
    <div class="card">
      <div class="card-body">
        <div class="multi-range-price">
          <div class="multi-range-title pb-75">
            <h6 class="filter-title mb-0">Multi Range</h6>
          </div>
          <ul class="list-unstyled price-range" id="price-range">
            <li>
              <span class="vs-radio-con vs-radio-primary py-25">
                <input
                  type="radio"
                  name="price-range"
                  checked
                  @change="searchByPrice(0, 0)"
                  value="false"
                />
                <span class="vs-radio">
                  <span class="vs-radio--border"></span>
                  <span class="vs-radio--circle"></span>
                </span>
                <span class="ml-50">All</span>
              </span>
            </li>
            <li>
              <span class="vs-radio-con vs-radio-primary py-25">
                <input
                  type="radio"
                  name="price-range"
                  @change="searchByPrice(0, 10)"
                  value="false"
                />
                <span class="vs-radio">
                  <span class="vs-radio--border"></span>
                  <span class="vs-radio--circle"></span>
                </span>
                <span class="ml-50"> &lt;=$10</span>
              </span>
            </li>
            <li>
              <span class="vs-radio-con vs-radio-primary py-25">
                <input
                  type="radio"
                  name="price-range"
                  @change="searchByPrice(11, 100)"
                  value="false"
                />
                <span class="vs-radio">
                  <span class="vs-radio--border"></span>
                  <span class="vs-radio--circle"></span>
                </span>
                <span class="ml-50">$10 - $100</span>
              </span>
            </li>
            <li>
              <span class="vs-radio-con vs-radio-primary py-25">
                <input
                  type="radio"
                  name="price-range"
                  @change="searchByPrice(101, 500)"
                  value="false"
                />
                <span class="vs-radio">
                  <span class="vs-radio--border"></span>
                  <span class="vs-radio--circle"></span>
                </span>
                <span class="ml-50">$100 - $500</span>
              </span>
            </li>
            <li>
              <span class="vs-radio-con vs-radio-primary py-25">
                <input
                  type="radio"
                  name="price-range"
                  @change="searchByPrice(501, 0)"
                  value="false"
                />
                <span class="vs-radio">
                  <span class="vs-radio--border"></span>
                  <span class="vs-radio--circle"></span>
                </span>
                <span class="ml-50">&gt;= $500</span>
              </span>
            </li>
          </ul>
        </div>
        <!-- /Price Filter -->
        <hr />
        <!-- Categories Starts -->
        <div id="product-categories">
          <div class="product-category-title">
            <h6 class="filter-title mb-1">Categories</h6>
          </div>
          <ul
            class="list-unstyled categories-list"
            v-if="categories.length > 0"
          >
            <li v-for="(category, key) in categories" :key="key">
              <span class="vs-radio-con vs-radio-primary py-25">
                <input
                  type="radio"
                  name="category-filter"
                  :value="category.id"
                  v-model="search.category"
                  @change="searchNow"
                />
                <span class="vs-radio">
                  <span class="vs-radio--border"></span>
                  <span class="vs-radio--circle"></span>
                </span>
                <span class="ml-50">{{ category.name }}</span>
              </span>
            </li>
          </ul>
        </div>
        <!-- Categories Ends -->
        <hr />
        <!-- Brands -->
        <div class="brands">
          <div class="brand-title mt-1 pb-1">
            <h6 class="filter-title mb-0">Brands</h6>
          </div>
          <div class="brand-list" id="brands">
            <ul class="list-unstyled" v-if="brands && brands.length > 0">
              <li
                v-for="(brand, key) in brands"
                :key="key"
                class="d-flex justify-content-between align-items-center py-25"
              >
                <span class="vs-checkbox-con vs-checkbox-primary">
                  <input
                    type="checkbox"
                    v-model="search.brands"
                    :value="brand.id"
                    @change="searchNow"
                  />
                  <span class="vs-checkbox">
                    <span class="vs-checkbox--check">
                      <i class="vs-icon feather icon-check"></i>
                    </span>
                  </span>
                  <span class="">{{ brand.name }}</span>
                </span>
                <span>{{ brand.products_count }}</span>
              </li>
            </ul>
          </div>
        </div>
        <!-- /Brand -->
        <hr />
        <!-- Rating section starts -->
        <div id="ratings">
          <div class="ratings-title mt-1 pb-75">
            <h6 class="filter-title mb-0">Ratings</h6>
          </div>
          <div class="d-flex justify-content-between">
            <ul class="unstyled-list list-inline ratings-list mb-0">
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li>& up</li>
            </ul>
            <div class="stars-received">(160)</div>
          </div>
          <div class="d-flex justify-content-between">
            <ul class="unstyled-list list-inline ratings-list mb-0">
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li>& up</li>
            </ul>
            <div class="stars-received">(176)</div>
          </div>
          <div class="d-flex justify-content-between">
            <ul class="unstyled-list list-inline ratings-list mb-0">
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li>& up</li>
            </ul>
            <div class="stars-received">(291)</div>
          </div>
          <div class="d-flex justify-content-between">
            <ul class="unstyled-list list-inline ratings-list mb-0">
              <li class="ratings-list-item">
                <i class="feather icon-star text-warning"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li class="ratings-list-item">
                <i class="feather icon-star text-light"></i>
              </li>
              <li>& up</li>
            </ul>
            <div class="stars-received">(190)</div>
          </div>
        </div>
        <!-- Rating section Ends -->
        <hr />
        <!-- Clear Filters Starts -->
        <div id="clear-filters">
          <button class="btn btn-block btn-primary">CLEAR ALL FILTERS</button>
        </div>
        <!-- Clear Filters Ends -->
      </div>
    </div>
  </div>
  <!-- Ecommerce Sidebar Ends -->
</template>


<script>
export default {
  props: {
    brands: {
      type: Array,
      default: function () {
        return [];
      },
    },
    categories: {
      type: Array,
      default: function () {
        return [];
      },
    },
  },
  data: function () {
    return {
      search: {
        category: null,
        brands: [],
        start: 0,
        end: 0,
      },
    };
  },
  methods: {
    searchNow: function () {
      this.$emit("searchFromNabvar", this.search);
    },
    searchByPrice: function (start, end) {
      this.search.start = start;
      this.search.end = end;
      this.searchNow();
    },
  },
};
</script>