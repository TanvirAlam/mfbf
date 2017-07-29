export default {
    state: {
        sidebar: {
            opened: false,
            hidden: false
        },
        device: {
            isMobile: false,
            isTablet: false
        },
        effect: {
            translate3d: true
        }
    },
    getters: {
        sidebar: state => state.sidebar,
        device: state => state.device,
        effect: state => state.effect
    },
    mutations: {
        TOGGLE_SIDEBAR (state, config) {
            if (state.device.isMobile && config.hasOwnProperty('opened')) {
                state.opened = config.opened
            } else {
                state.opened = true
            }

            if (config.hasOwnProperty('hidden')) {
                state.hidden = config.hidden
            }
        },

        TOGGLE_DEVICE (state, device) {
            state.device.isMobile = device === 'mobile'
            state.device.isTablet = device === 'tablet'
        },

        SWITCH_EFFECT (state, effectItem) {
            for (let name in effectItem) {
                state.effect[name] = effectItem[name]
            }
        }
    },
    actions: {
        toggleSidebar ({ commit }, config) {
            if (config instanceof Object) {
                commit('TOGGLE_SIDEBAR', config)
            }
        },

        toggleDevice ({ commit }, device) {
            commit('TOGGLE_DEVICE', device)
        },

        switchEffect ({ commit }, effectItem) {
            if (effectItem) {
                commit('SWITCH_EFFECT', effectItem)
            }
        }
    }
}
