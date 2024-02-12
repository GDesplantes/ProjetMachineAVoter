class JsonDb {
    static async fetchJson(url) {
        let reponse = await fetch(url);
        let objectJS = await reponse.json();
        return objectJS;
    }
}

export { JsonDb };