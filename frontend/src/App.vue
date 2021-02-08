<template>
  <div id="app">
    <div>
      <b-navbar toggleable="lg" type="dark" variant="dark">
        <b-navbar-nav>
          <b-navbar-brand tag="h1" class="mb-0">Potential</b-navbar-brand>

          <b-navbar-nav>
            <b-nav-item to="/home">Início</b-nav-item>
          </b-navbar-nav>

          <b-nav-item-dropdown text="Cadastro" left>
            <b-dropdown-item to="/developers">Desenvolvedores</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-navbar>
    </div>

    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>

</style>
