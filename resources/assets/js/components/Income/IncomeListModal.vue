<template>
    <form action="">
        <div class="modal-card">
            <header class="modal-card-head">
                <img src="img/income_new.png" alt="User Image">
                <label class="label">View income</label>
            </header>
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column">
                        <b-field label="Collected at">
                            <div class="control">
                                Month wise date picker
                            </div>
                        </b-field>
                    </div>
                    <div class="column">
                        <b-field label="Category">
                            <div class="control">
                                Autocomplete
                            </div>
                        </b-field>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th><abbr title="Number">NO</abbr></th>
                        <th><abbr title="Category">CAT</abbr></th>
                        <th><abbr title="Amount before skat">AMT-BS</abbr></th>
                        <th><abbr title="Amount after skat">AMT-BS</abbr></th>
                        <th><abbr title="Interval">INT</abbr></th>
                        <th><abbr title="Occourence">OCC</abbr></th>
                        <th><abbr title="Edit">EDT</abbr></th>
                        <th><abbr title="Delete">DEL</abbr></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1</th>
                        <td>
                            <a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">
                                Salary
                            </a>
                        </td>
                        <td>25,000 DKK</td>
                        <td>15,000 DKK</td>
                        <td>M</td>
                        <td>A</td>
                        <td>
                            <a class="button is-success is-small" @click="$parent.close()">
                                <span class="icon is-small">
                                  <icon class="fa fa-edit"></icon>
                                </span>
                            </a>
                        </td>
                        <td>
                            <a class="button is-danger is-small" @click="$parent.close()">
                                <span class="icon is-small">
                                  <icon class="fa fa-trash"></icon>
                                </span>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </section>
            <footer class="modal-card-foot">
                <a class="button is-danger is-small" @click="$parent.close()">
                        <span class="icon is-small">
                          <icon class="fa fa-close"></icon>
                        </span>
                    <span>Close</span>
                </a>
                <a class="button is-primary is-small">
                        <span class="icon is-small">
                          <icon class="fa fa-bank"></icon>
                        </span>
                    <span>Sync with bank</span>
                </a>
            </footer>
        </div>
    </form>
</template>

<style scoped>
    .modal-card {
        width: auto;
    }
</style>
