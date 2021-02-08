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
                  <b-nav-form>
                    <b-form-input id="filter-input" v-model="filter" type="search" placeholder="Filtro"></b-form-input>
                  </b-nav-form>
                </b-col>
                <b-col>
                  <b-nav card-header pills align="end">
                    <b-nav-item to="/developers/new" active>Novo Desenvolvedor</b-nav-item>
                  </b-nav>
                </b-col>
              </b-row>
            </b-card-header>
            <b-card-body>
              <b-card-text>
                <b-table striped hover borderless responsive primary-key="id" :filter="filter" :items="items" :fields="fields">
                  <template #cell(acoes)="row">
                    <b-button-group size="sm">
                      <b-button variant="info" @click="visualizar(row.item.id)">Visualizar</b-button>
                      <b-button variant="secondary">Editar</b-button>
                      <b-button variant="danger" @click="deleteDeveloper(row.item.id, row.index)">Excluir</b-button>
                    </b-button-group>
                  </template>
                </b-table>
              </b-card-text>
            </b-card-body>
          </b-card>
        </b-col>
        <b-col cols="1"></b-col>
      </b-row>
    </b-container>
    <b-modal ref="modal-details" hide-footer title="Detalhes">
      <div class="d-block">
        <p><strong>{{ item.nome }}</strong></p>

        <p>Sexo: {{ (item.sexo == 'M') ? 'Masculino' : 'Feminino' }}</p>
        <p>Data de Nascimento: {{ formatDate(item.data_nascimento) }}</p>
        <p>Idade: {{ item.idade }}</p>
        <p>Hobby: {{ item.hobby }}</p>

        <i size="sm">Cadastrado em: {{ formatDate(item.created_at) }}</i>
      </div>
    </b-modal>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'DevHome',
  data() {
    return {
      fields: [
        { key: 'nome', label: 'Nome', sortable: true },
        { key: 'sexo', label: 'Sexo' },
        { key: 'idade', label: 'Idade' },
        { key: 'data_nascimento', label: 'Dt. Nascimento' },
        { key: 'acoes', label: 'Ações' }
      ],
      items: null,
      filter: null,
      filterOn: [],
      item: []
    }
  },
  methods: {
    visualizar (id) {
      axios.get('/developers/' + id)
      .then(response => {
        this.$refs['modal-details'].show()
        this.item = response.data[0]
      })
    },
    deleteDeveloper(id, index) {
      axios.delete('/developers/' + id)
      .then(response => {
        this.items.splice(index, 1)
      })
    },
    formatDate (date) {
      let data = new Date(date);
      return data.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
    }
  },
  mounted () {
    axios.get('/developers')
    .then(response => (this.items = response.data))
  }
}
</script>

<style scoped>

</style>