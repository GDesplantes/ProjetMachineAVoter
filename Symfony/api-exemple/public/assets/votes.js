import { JsonDb } from "./Db.js";
import {Candidats} from './Candidats.js';
const candidatsUrl = 'http://localhost:3000/api/candidats';

const app = {
    data() {
        return {
            nbCandidats: 10,
            listeCandidat:[]
        }
    },
    async mounted() {
        let repForm = await JsonDb.fetchJson(candidatsUrl);
        for (let item of repForm) {
            this.listeCandidat.push(new Candidats(item));
            
        }
        console.log(this.listeCandidat);
    },
    computed: {

    }, 
    methods: {

    }
}

Vue.createApp(app).mount('#app');