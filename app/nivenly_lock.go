package nivenly

func (v *Nivenly) Lock() {
	v.mutex.Lock()
}

func (v *Nivenly) Unlock() {
	v.mutex.Unlock()
}
