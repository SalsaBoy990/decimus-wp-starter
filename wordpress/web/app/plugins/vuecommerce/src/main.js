import Vue from "vue";
import router from "./app-routes";
import VueI18n from "vue-i18n";
import {library} from "@fortawesome/fontawesome-svg-core";
import {faTimes, faSearch, faChevronDown, faChevronUp} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";

import App from "./App.vue";

require("animate.css");

library.add(faTimes, faSearch, faChevronDown, faChevronUp);
Vue.component("font-awesome-icon", FontAwesomeIcon);

Vue.config.productionTip = false;

Vue.use(VueI18n);

// Ready translated locale messages
const messages = {
    en: {
        navigation: {
            search: "Search",
            categories: "Categories",
        },
        shared: {
            loading: "Loading... ",
            error: "The request could not be processed!",
            search: "Search",
            placeholder: "Search in titles and excerpts for...",
            posts: "Items",
            foundOf: "Found {numberOfResults} of {numberOfAllPosts}",
        },
        postsPage: {
            filterByCategories: "Filter by Categories",
            sortByDateOrder: "Sort by Date",
            newestFirst: "Newest first",
            oldestFirst: "Oldest first",
            discounted: "On sale",
            readMore: "Read more",
        },
        categoriesPage: {
            allPosts: "All Posts",
            postsInCategory: "posts in category",
        },
        productsPage: {
            filterByCategory: "Filter by Category",
            filterByPrice: "Filter by Price",
            filterByOnSale: "Only On Sale Products",
            sortByProps: "Sort products",
            maxPrice: "Max price:",
            minPrice: "Min price:",
            error: "The minimum price should be less than the maximum price.",
            selectOptions: "Select options",
        },
        sortProducts: {
            sortBy: "Select sorting option",
            newest: "Newest First",
            popular: "Most Popular",
            cheap: "Cheapest First",
            abc: "In Alphabetical Order",
        },
        searchPosts: {
            detailedSearch: "Detailed search/filter",
        },
    },
    hu: {
        navigation: {
            searchPosts: "Bejegyz??skeres??s",
            searchProducts: "Term??kkeres??s",
            productCategories: "Term??kkateg??ri??k",
            postCategories: "Bejegyz??s-kateg??ri??k",
        },
        shared: {
            loading: "Bet??lt??s... ",
            error: "A k??r??st nem lehetett feldolgozni!",
            search: "Keres??s",
            placeholder: "Keres??s a c??mekben ??s a le??r??sban...",
            posts: "elem",
            foundOf: "{numberOfResults} tal??lat {numberOfAllPosts} elemb??l",
        },
        postsPage: {
            filterByCategories: "Sz??r??s kateg??r??k szerint",
            sortByDateOrder: "Rendez??s d??tum szerint",
            newestFirst: "Leg??jabb el??l",
            oldestFirst: "legr??gebbi el??l",
            readMore: "Tov??bb olvasom",
        },
        categoriesPage: {
            allPosts: "??sszes bejegyz??s",
            postsInCategory: "bejegyz??s a kateg??ri??ban",
        },
        productsPage: {
            filterByCategory: "Kateg??ria szerint sz??r??s",
            filterByPrice: "??r szerint sz??r??s",
            filterByOnSale: "Csak a le??rt??kelt term??kek",
            sortByProps: "Sorba rendez??s",
            discounted: "Le??rt??keltek",
            maxPrice: "Legdr??g??bb:",
            minPrice: "Legolcs??bb:",
            error: "A minimum ??rnak kisebbnek kell lennie a maximum ??rn??l.",
            selectOptions: "V??lassz opci??t",
        },
        sortProducts: {
            sortBy: "V??lassz sorbarendez??si m??dot",
            newest: "A leg??jabb el??l",
            popular: "A legn??pszer??bb el??l",
            cheap: "A legolcs??bb el??l",
            abc: "ABC sorrendben",
        },
        searchPosts: {
            detailedSearch: "R??szletes keres??s/sz??r??s",
        },
    },
};

const i18n = new VueI18n({
    locale: "hu", // set locale
    messages: messages, // set locale ui texts
});

new Vue({
    render: (h) => h(App),
    router,
    i18n,
}).$mount("#vuecommerce-filter-products");
