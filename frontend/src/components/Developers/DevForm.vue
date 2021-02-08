<template>
  <div>
    <b-container fluid class="mt-4">
      <b-row no-gutters>
        <b-col cols="1"></b-col>
        <b-col cols="10">
          <b-card title="Card Title" no-body>
            <b-card-header header-tag="nav">
              <b-row no-gutters>
                <b-col>
                  <b-nav card-header pills>
                    <b-nav-item to="/developers" active><b-icon icon="arrow-left-short"></b-icon> Voltar</b-nav-item>
                  </b-nav>
                </b-col>
              </b-row>
            </b-card-header>
            <b-card-body>
              <b-alert variant="danger" dismissible fade :show="showAlert" @dismissed="showAlert=false">Não foi possível cadastrar desenvolvedor.</b-alert>
              <b-card-text>
                <b-form @submit="onSubmit">
                  <b-form-group id="input-group-1" label="Nome Completo:" label-for="name">
                    <b-form-input id="name" v-model="item.nome" type="text" required ></b-form-input>
                  </b-form-group>
                  <b-row>
                    <b-col>
                      <b-form-group id="input-group-2" label="Sexo:" for="inline-form-input-sex">
                        <b-form-select id="sex" v-model="item.sexo" :options="options" required></b-form-select>
                      </b-form-group>
                    </b-col>
                    <b-col>
                      <b-form-group id="input-group-3" label="Data Nascimento:" for="inline-form-input-birthdate">
                        <b-form-input id="birthdate" v-model="item.data_nascimento" type="text" placeholder="aaaa-mm-dd" required></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col>
                      <b-form-group id="input-group-4" label="Idade:" for="inline-form-input-age">
                        <b-form-input id="hobby" v-model="item.idade" type="number" required></b-form-input>
                      </b-form-group>
                    </b-col>
                    <b-col>
                      <b-form-group id="input-group-5" label="Hobby:" for="inline-form-input-hobby">
                        <b-form-input id="hobby" v-model="item.hobby" type="text" required></b-form-input>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-button type="submit" variant="primary">Submit</b-button>
                </b-form>
              </b-card-text>
            </b-card-body>
          </b-card>
        </b-col>
        <b-col cols="1"></b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'DevNew',
  data() {
    return {
      item: {
        nome: null,
        sexo: null,
        idade: null,
        data_nascimento: null,
        hobby: null
      },
      options: [
        { value: 'M', text: 'Masculino' },
        { value: 'F', text: 'Feminino' }
      ],
      showAlert: false
    }
  },
  methods: {
    onSubmit(event) {
      event.preventDefault()

      let json = JSON.stringify(this.item)

      axios.post('/developers/store', json)
      .then(response => {
        console.log('ok');
      })
      .catch(error => {
        this.showAlert = true
      })
    }
  }
}
</script>

<style scoped>

</style>