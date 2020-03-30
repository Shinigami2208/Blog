<template>
    <div class="container">
        <!-- <div v-show="loading">Data loading...</div> -->
        <table class="table table-bordered">
            <tr>
                <th>Ten Bai Viet</th>
                <th width="50"></th>
                <th width="50"></th>
            </tr>
            <tr v-for="(article, index) in articles" v-bind:key="index">
                <td>
                    <span v-show="currentEditIndex != index">{{article.title}}</span>
                    <input type="text" v-model="article.title" v-show="currentEditIndex == index">
                </td>
                <td>
                    <button @click="currentEditIndex = index" v-show="currentEditIndex != index" class="btn btn-primary">Sua</button>
                    <button @click="updateArticle(article)" v-show="currentEditIndex == index" class="btn btn-primary">Xong</button>
                </td>
                <td><button @click="deleteArticle(article, index)" class="btn btn-primary">Xoa</button></td>
            </tr>
        </table>
        <div>
            <nav aria-label="Page navigation example">
                <paginate
                    :page-count="totalPages"
                    :click-handler="clickPageNumber"
                    :prev-text="'Prev'"
                    :next-text="'Next'"
                    :page-class="'page-item'"
                    :next-link-class="'page-link'"
                    :prev-link-class="'page-link'"
                    :page-link-class="'page-link'"
                    :container-class="'pagination'">
                </paginate>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                articles: [],
                totalPages: 0,
                loading: false,
                current_page: 1,
                currentEditIndex: null
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
                this.loading = true;
                axios.get('/api/article/list?page='+this.current_page)
                .then((response)=>{
                    this.articles = response.data.data;
                    this.totalPages = response.data.last_page;
                    this.loading = false;
                })
                .catch((error)=>{
                    console.log(error);
                });
            },
            clickPageNumber(pageNumber){
                this.current_page = pageNumber;
                this.getData();
            },
            deleteArticle(article, index){
                axios.post('/api/article/delete', {
                    id: article.id
                })
                .then((response) => {
                    this.articles.splice(index, 1);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            updateArticle(article){
                axios.post('/api/article/update', {
                    article: article
                })
                .then(response => {
                    this.currentEditIndex = null;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            clickPageNumber: function(pageNum) {
                this.current_page = pageNum;
                this.getData();
            }
        }
    }
</script>
