<template>
  <v-app>
    <v-toolbar>
      <v-menu offset-y>
        <!-- <v-icon left>developer_board</v-icon>  -->
        <template v-slot:activator="{ on }">
          <v-btn
            color="primary"
            dark
            v-on="on"
          >
            Boards
          </v-btn>
        </template>
        <v-list>
          <v-list-item v-for="item in items" :key="item.title">
            <v-list-item-title>{{ item.title}}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>

      <v-spacer></v-spacer>

      <v-toolbar-title v-text="title"></v-toolbar-title>

      <v-spacer></v-spacer>

      <div>
        <router-link to="register" tag="span"> <v-btn >Register</v-btn> </router-link>
      </div>
    </v-toolbar>  

    <main>
      <v-container fluid>
         <router-view></router-view>
      </v-container>
    </main>
  </v-app>
</template>

<script>
// import HelloWorld from './components/HelloWorld';

export default {
  name: 'App',

  components: {
    // HelloWorld,
  },

  data: () => ({
    drawer: false,
    title: 'Toolbar Title',
    items: [
      {
        icon : 'bubble_chart',
        title: 'hello'
      },
      {
        icon : 'bubble_chart',
        title: 'hello'
      },
      {
        icon : 'bubble_chart',
        title: 'hello'
      },
      {
        icon : 'bubble_chart',
        title: 'hello'
      },
    ]
  }),
};
</script>
