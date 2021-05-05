<template>
    <div class="container row" style="
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    justify-content: space-between;
    ">
        
            <div class="filter__wrapper col-md-3 listing hover-effect">
                <div class="row" style="padding: 1.5em;
                background-color: #fff;justify-content: space-between;align-items:center">
                    <div class="form-group" style="width: 100%;">
                        <h4>Фильтры</h4>
                        <hr>
                        <label for="city_sr">Город</label>
                        <select @change="sortValue" required v-model="city" id="city_sr" class="form-input form-input--pill form-input--border-c-gallery">
                            <option value="">Выберите город</option>
                            <option :value='citi.id' v-for="citi in Cities" :key="citi.id">
                                {{citi.title}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group" style="width: 100%;">
                        <label for="apart_type">Тип строения</label>
                        <select @change="sortValue" v-model="apart_type" id="apart_type" class="form-input form-input--pill form-input--border-c-gallery">
                            <option value="">Выберите тип строения</option>
                            <option :value='ac.id' v-for="ac in ApartmentCategory" :key="ac.id">
                                {{ac.title}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group" style="width: 100%;">
                        <label for="quality_type">Тип отделки</label>
                        <select @change="sortValue" v-model="quality_type" id="quality_type" class="form-input form-input--pill form-input--border-c-gallery">
                            <option value="">Выберите тип отделки</option>
                            <option :value='qt.id' v-for="qt in Quality" :key="qt.id">
                                {{qt.title}}
                            </option>
                        </select>
                    </div>
                   <div class="form-group" style="width: 100%;">
        <label for="quality_type">Застройщики</label>
        <select @change="sortValue" v-model="builders_name" class="form-input form-input--pill form-input--border-c-gallery" id="quality_type">
          <option value="">Выберите застройщика</option>
          <option :value='bld.id' v-for="bld in Builders" :key="bld.id">{{bld.title}}</option>
      </select>
  </div>
  <div class="form-group" style="width: 100%;">
    <label for="quality_type">Квартал сдачи</label>
    <select @change="sortValue" v-model="quarter_time" class="form-input form-input--pill form-input--border-c-gallery" id="quality_type">
      <option value="">Выберите квартал сдачи</option>
      <option :value='qrt.id' v-for='qrt in Quarter' :key="qrt.id">{{qrt.title}}</option>
  </select>
</div>
<div class="form-group" style="width: 100%;">
    <label for="quality_type">Тип дома</label>
    <select @change="sortValue" v-model="hometypes_name" class="form-input form-input--pill form-input--border-c-gallery" id="quality_type">
      <option value="">Выберите тип дома</option>
      <option :value='ht.id' v-for="ht in HomeTypes" :key="ht.id">{{ht.title}}</option>
  </select>
</div>
<div class="form-group" style="width: 100%;">
    <label for="quality_type" class="text-center mx-auto">Цена</label> <br>
    <div class="form-row">
      <div class="col">
        <input type="text" name="price_from" class="form-control" placeholder="От">
    </div>
    <div class="col">
        <input type="text" name='price_to' class="form-control" placeholder="До">
    </div>
</div>
</div>
                    <div class="form-group" style="margin: unset">
                        <button type="submit" @click="sortValue" class="submit__btn">Поиск</button>
                    </div>
                </div>
            </div>
            <div class="row result_div col-md-9" >
                <div class="error" v-if="this.error != null">
                    {{this.error}}
                </div>
                <div class="card__wrapper listing hover-effect">
                    <div class="row" style="justify-content: space-evenly">
                <div name='hidden_old' class="" v-for="apart in result" :key="apart.id">
                    <div class="card news_card mt-4 mb-4">
                        <div class="head__news">
                            <div class="post-thumbnail">
                                <img class="card-img-top" :src="'uploads/'+apart.image" :alt="apart.title">
                            </div>
                        </div>
                        <div class="card-body column">
                        <h5 class="news__title card-title">{{apart.title}}</h5>
                            
                               
                                <span><b>Город:</b> {{apart.citi.title}}</span>
                                <span><b>Кол-во комнат:</b> {{apart.apartmentcategoty.title}}</span>
                                <span><b>Тип отделки:</b> {{apart.apartmentsfinish.title}}</span>
                                <span v-if="apart.builder"><b>Застройщик:</b> {{apart.builder.title}}</span>
                                <span v-if="apart.quarter"><b title="В каком квартале жилье станет доступно">Квартал сдачи:</b> {{apart.quarter.title}}</span>
                                <span v-if="apart.apartmentshometype"><b>Тип постройки:</b> {{apart.apartmentshometype.title}}</span>
                                <span v-if="apart.price"><b>Цена:</b> {{apart.price}} P</span>
                                
                                <br>
                                <div class="button__wrapper">
                                <button class="submit__btn"><a style="color: #fff" :href="'/kvartirishow/'+apart.slug">Подробнее</a></button>
                                </div>
  
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
    </div>
</template>
<style lang="scss">
    .result_div {
        .card__wrapper {
        width: 100%;
        }
        .column{
            display: flex;
            flex-direction: column;
        }
    }
</style>
<script>
import axios from 'axios'
export default {
    data(){
        return{
            city: '',
            apart_type: '',
            quality_type: '',
            builders_name: '',
            quarter_time: '',
            hometypes_name: '',
            result: [],
            error: null
        }
    },
    props:{
        Apartments:{
            type: Array
        },
        Cities:{
            type: Array,
            required: true
        },
        ApartmentCategory:{
            type: Array,
            required: true
        },
        Quality:{
            type: Array,
            required: true
        },
        Quarter:{
            type: Array,
            required: true
        },
        Builders:{
            type: Array,
            required: true
        },
        HomeTypes:{
            type: Array,
            required: true
        }
    },
    methods:{
        sortValue(){
            axios.post('/search-your-home', {
                city:this.city,
                apart_type: this.apart_type,
                quality_type: this.quality_type,
                builders_name: this.builders_name,
                hometypes_name: this.hometypes_name,
                quarter_time: this.quarter_time
                 })
            .then(response => (this.result = response.data.result))
            .catch(error => (this.error = 'Что то пошло не так, перезагрузите страницу'));
                
        }

    },
    created(){
        console.log(this.result.length);
        if(this.result.length == 0 || this.Apartments.length == 0){
            this.result = this.Apartments
        }
    },
}
</script> 