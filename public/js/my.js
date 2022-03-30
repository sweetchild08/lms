
    const setup = () => {
        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
            }
            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }

        return {
            loading: true,
            isDark: getTheme(),
            toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
            },
        }
    }

    const showInputErrors=(err)=>{
        $('small').html('')
        err.responseJSON?.errors && (
            Object.entries(err.responseJSON.errors).forEach(([key,value])=>{
                $('#error-'+key).show()
                $('#error-'+key).html(value)
            })
        )
    }
