<template>
    <div class="container">
        <div v-show="loading">Data loading...</div>
        <table class="table table-bordered">
            <tr>
                <th>Ten Bai Viet</th>
                <th width="40"></th>
                <th width="40"></th>
            </tr>
            <tr v-for="(article, index) in articles" v-bind:key="index">
                <td>
                    <span v-show="article.showEdit == false">{{article.title}}</span>
                    <input type="text" v-model="article.title" v-show="article.showEdit == true">
                </td>
                <td><button @click="article.showEdit = true">Sua</button></td>
                <td><button @click="deleteArticle(article, index)">Xoa</button></td>
            </tr>
        </table>
        <div>
            <a href="#" @click="clickPageNumber(pageNumber)" v-for="pageNumber in totalPages" v-bind:key="pageNumber">{{pageNumber}}</a>
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
                current_page: 1
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
                    this.articles.map((article)=>{
                        article.showEdit = false;
                        return article;
                    });
                    console.log(this.articles);
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
            }
        }
    }
</script>
